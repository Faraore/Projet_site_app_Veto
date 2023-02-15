<?php
    class famille{
        private $c_id;
        private $c_type;
        

        public function__construct(string $type, string $race){
            $this->c_id = 0;
            $this->c_type = $type;
            

        }

        public function getId(): int{
            return $this->c_id;
        }
        public function setId(int $id): void{
           $this->c_id = $id;
        }

        public function getType(): string{
            return $this->c_type;
        }
        public function setType(string $type): void{
           $this->c_type = $type;
        }
        





    }