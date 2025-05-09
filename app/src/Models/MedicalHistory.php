<?php

namespace App\Models;
use App\Connection\Db;


class MedicalHistory
{
    public string $pet_name = "";
    public int $appointment_date;
    public string $notes = "";
    public string $medications = "";
    public int $id = 0;
    public ?\mysqli $conn;
    public static string $table_name = "medical_history";

    private function __construct(string $pet_name, int $appointment_date, string $notes, string $medications, int $id, ?\mysqli $conn = null)
    {
        $this->pet_name = $pet_name;
        $this->appointment_date = $appointment_date;
        $this->notes = $notes;
        $this->medications = $medications;
        $this->id = $id;
        $this->conn = $conn;
    }

    public function __destruct()
    {
        if ($this->conn)
            $this->conn->close();
    }

    public static function create(string $pet_name, string $notes, string $medications, ?int $appointment_date = null): MedicalHistory
    {
        $conn = Db::get();

        $table_name = MedicalHistory::$table_name;
        $stmt = $conn->prepare("INSERT INTO {$table_name}(pet_name,appointment_date,notes,medications) VALUES (?,?,?,?)");
        if (!$appointment_date) {
            $appointment_date = time();
        }
        $stmt->execute([$pet_name, date('Y-m-d H:i:s', $appointment_date), $notes, $medications]);

        return new MedicalHistory($pet_name, $appointment_date, $notes, $medications, $stmt->insert_id, $conn);
    }

    public function save(): void
    {
        $table_name = MedicalHistory::$table_name;
        $stmt = $this->conn->prepare("UPDATE {$table_name} SET pet_name=?,appointment_date=?,notes=?,medications=? WHERE id = ?");
        $stmt->execute([$this->pet_name, date('Y-m-d H:i:s', $this->appointment_date), $this->notes, $this->medications, $this->id]);
    }

    public function delete(): void
    {
        $table_name = MedicalHistory::$table_name;
        $stmt = $this->conn->prepare("DELETE FROM {$table_name} WHERE id = ?");
        $stmt->execute([$this->id]);
    }

    public static function all(): array
    {
        $table_name = MedicalHistory::$table_name;
        $conn = Db::get();
        $q = $conn->query("SELECT * FROM $table_name")->fetch_all(MYSQLI_ASSOC);
        $q = array_map(function ($item) {
            return new MedicalHistory($item["pet_name"], strtotime($item["appointment_date"]), $item["notes"], $item["medications"], $item["id"]);
        }, $q);

        return $q;
    }

    public static function byId(int $id): ?MedicalHistory
    {
        $table_name = MedicalHistory::$table_name;
        $conn = Db::get();
        $stmt = $conn->prepare("SELECT * FROM $table_name WHERE id = ?");
        $q = $stmt->execute([$id]);

        if (!$q) return null;
        $assoc = $stmt->get_result()->fetch_assoc();
        if (!$assoc) return null;

        return new MedicalHistory($assoc["pet_name"], strtotime($assoc["appointment_date"]), $assoc["notes"], $assoc["medications"], $assoc["id"], $conn);
    }
}
