
<?php
   class Estudante {
      /* Member variables */
      var $nome;
      var $idade;
      var $morada;
      var $username;
      var $password;
      
      
      function fraseApresentacao(){
          return "ola o meu nome é ". $this->nome ." e tenho " . $this->idade . " anos";
      }
      /* Member functions */
      function setNome($nome){
         $this->nome = $nome;
      }
      
      function getNome(){
         echo $this->nome ."<br/>";
      }
      
      function setIdade($idade){
         $this->idade = $idade;
      }
      
      function getIdade(){
         echo $this->idade ." <br/>";
      }
      
      function getMorada() {
          return $this->morada;
      }

      function setMorada($morada) {
          $this->morada = $morada;
      }
      
      function getUsername() {
          return $this->username;
      }

      function getPassword() {
          return $this->password;
      }

      function setUsername($username) {
          $this->username = $username;
      }

      function setPassword($password) {
          $this->password = $password;
      }


   }
?>