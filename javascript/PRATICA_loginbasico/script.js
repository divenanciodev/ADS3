const form = document.getElementById("formLogin");
const mensagem = document.getElementById("mensagem");

form.addEventListener("submit", function (evento) {
  evento.preventDefault();

  const usuario = document.getElementById("usuario").value.trim();
  const senha = document.getElementById("senha").value;

  if (usuario === "" || senha === "") {
    mensagem.textContent = "Preencha usuário e senha.";
    mensagem.className = "erro";
    return;
  }

  mensagem.textContent = "Bem-vindo, " + usuario + "!";
  mensagem.className = "ok";
});
