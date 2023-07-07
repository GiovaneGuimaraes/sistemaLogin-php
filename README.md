# Sistema de login e cadastro utilizando php

Projeto feito para estudo

redes: www.linkedin.com/in/giovane-guimar%C3%A3es-a06683211/


  Trata-se de um sistema de login em PHP. O projeto contem um sistema de mensagens, onde os usuários podem se cadastrar, fazer login e enviar mensagens. O foco principal não é o embelezamento do site, mas sim, sua aplicação no backend.
  
  O index do site verifica primeiramente se o usuario está autenticado, se a sessão ainda esta ativa, caso contrario, exibe a mensagem informando que é necessário fazer login ou se cadastrar antes de usar o serviço.

![2](https://github.com/GiovaneGuimaraes/sistemaLogin-php/assets/133304083/4199cd32-68d4-4f68-b76e-2aad5dfc9502)

  Se o usuário não estiver autenticado, ele realiza o cadastro e a inserção no banco de dados pelo método POST com os requisitos de nome, email e senha (já criptografada).

![3](https://github.com/GiovaneGuimaraes/sistemaLogin-php/assets/133304083/9ff30e9e-bf6b-4ad3-a1d2-db0c534850e6)

  Já a parte de login do sistema pede o email e a senha do usuário ja cadastrada: 
  
![5](https://github.com/GiovaneGuimaraes/sistemaLogin-php/assets/133304083/653906bc-be6f-40e3-a0f2-f503a46d1196)

  Apos a realização do login o usuário é redirecionado ao seu 'perfil' em que contem suas mensagens secretas que são armazenadas apresentado a data e hora de escrita: 
  
![6](https://github.com/GiovaneGuimaraes/sistemaLogin-php/assets/133304083/99f6e869-7ba1-44d5-ab15-b7a0f701433f)




  
