<?php
    class connexion{
        private $c_id;
        private $c_mail;
        private $c_password;
        //private string $questionSecrete;

        public function __construct(string $mail, string $password){
            $this->c_mail = $mail;
            $this->c_password = password_hash($password, PASSWORD_BCRYPT);
            $this->c_id = 0;
        }

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
            $this->c_mail = $mail;
        }
        public function getPassword(): string{
            return $this->c_password;
        }
        public function setPassword(string $password): void{
            $this->c_password = $password;
        }


    }