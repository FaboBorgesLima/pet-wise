<?php

namespace App;

use App\Connection;

class MedicalHistory
{
    public string $pet_name = "";
    public int $appointment_date;
    public string $notes = "";
    public string $medications = "";
    public int $id = 0;
    private \mysqli $conn;
    static private string $table_name = "medical_history";

    private function __construct(string $pet_name, int $appointment_date, string $notes, string $medications, int $id, \mysqli $conn)
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
        $this->conn->close();
    }

    static function create(string $pet_name, string  $notes, string $medications, ?int $appointment_date = null): MedicalHistory
    {
        $conn = Connection::get();

        $table_name = MedicalHistory::$table_name;
        $stmt = $conn->prepare("INSERT INTO {$table_name}(pet_name,appointment_date,notes,medications) VALUES (?,?,?,?)");
        if (!$appointment_date) {
            $appointment_date = time();
        }
        $stmt->execute([$pet_name, date('Y-m-d H:i:s', $appointment_date), $notes, $medications]);

        return new MedicalHistory($pet_name, $appointment_date, $notes, $medications, $stmt->insert_id, $conn);
    }

    function save(): void
    {
        $table_name = MedicalHistory::$table_name;
        $stmt = $this->conn->prepare("UPDATE {$table_name} SET pet_name=?,appointment_date=?,notes=?,medications=? WHERE id = ?");
        $stmt->execute([$this->pet_name, date('Y-m-d H:i:s', $this->appointment_date), $this->notes, $this->medications, $this->id]);
    }

    function delete(): void
    {
        $table_name = MedicalHistory::$table_name;
        $stmt = $this->conn->prepare("DELETE FROM {$table_name} WHERE id = ?");
        $stmt->execute([$this->id]);
    }

    static function all(): array
    {
        $table_name = MedicalHistory::$table_name;
        $conn = Connection::get();
        $q = $conn->query("SELECT * FROM $table_name")->fetch_all();
        $conn->close();
        return $q;
    }

    static function byId(int $id): ?MedicalHistory
    {
        $table_name = MedicalHistory::$table_name;
        $conn = Connection::get();
        $stmt = $conn->prepare("SELECT * FROM $table_name WHERE id = ?");
        $q = $stmt->execute([$id]);

        if (!$q) return null;
        $assoc = $stmt->get_result()->fetch_assoc();
        if (!$assoc) return null;

        return new MedicalHistory($assoc["pet_name"], strtotime($assoc["appointment_date"]), $assoc["notes"], $assoc["medications"], $assoc["id"], $conn);
    }
}
