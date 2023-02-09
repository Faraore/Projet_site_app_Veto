<?php
    class connexion{
        private int $id;
        private string $mail;
        private string $password;
        //private string $questionSecrete;

        public function __construct(string $mail, string $password){
            $this->mail = $mail;
            $this->password = $password;
            $this->id = $id;
        }

        public function getId(): int{
            return $this->id;
        }
        public function setId(int $id): void{
            $this->id=$id;

        }
        public function getMail(): string{
            return $this->mail;
        }
        public function setMail(): void{
            $this->mail =$mail;
        }
        public function getPAssword(): string{
            return $this->password;
        }
        public function setPassword(): void{
            $this->password =$password;
        }


    }