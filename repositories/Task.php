<?php
    class Task implements JsonSerializable {

        private $id = null;
        private $nom = null;
        private $description = null;
        private $date = null;
        private $completed = null;
        private $user = null;

        public function __construct() {}

        public function getId() { return $this->id; }
        public function getNom() { return $this->nom; }
        public function getDescription() { return $this->description; }
        public function getDate() { return $this->date; }
        public function getCompleted() { return $this->completed; }
        public function getUser() { return $this->user; }

        public function setId($value) { $this->id = $value; }
        public function setNom($value) { $this->nom = $value; }
        public function setDescription($value) { $this->description = $value; }
        public function setDate($value) { $this->date = $value; }
        public function setCompleted($value) { $this->completed = $value; }
        public function setUser($value) { $this->user = $value; }

        public function jsonSerialize() {
            return [
                'user' => $this->user,
                'nom' => $this->nom,
                'description' => $this->description,
                'date' => $this->date,
                'completed' => $this->completed 
            ];
        }

        public static function fromDocument($result) {
            $instance = new self();
            $instance->setId($result->_id->__toString());
            $instance->setNom($result->nom);
            $instance->setDescription($result->description);
            //$instance->setDate(DateTime::createFromFormat('Y-m-d', $result->date));
            $instance->setDate($result->date);
            $instance->setCompleted($result->completed);
            $instance->setUser($result->user);
            return $instance;
        }
    }
?>