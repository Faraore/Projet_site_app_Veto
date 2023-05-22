<?php
    class connexion{
        private int $c_id;
        private string $c_mail;
        private string $c_password;
        
        //Constructeur connexion
        public function __construct(string $mail = '', string $password = ''){
            $this->c_mail = htmlspecialchars($mail);
            $this->c_password = password_hash($password, PASSWORD_BCRYPT);
            $this->c_id = 0;

        }
        
        //Getters & Setters 
        public function getId(): int{
            return $this->c_id;
        }
        public function setId(int $id): void{
            $this->c_id = $id;
        }
        public function getMail(): string{
            return $this->c_mail;
        }
        public function setMail(string $mail): void{
            $this->c_mail = htmlspecialchars($mail);
        }
        public function getPassword(): string{
            return $this->c_password;
        }
        public function setPassword(string $password): void{
            $this->c_password = $password;
        }


    }