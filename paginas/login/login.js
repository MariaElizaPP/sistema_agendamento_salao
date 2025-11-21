// Seleciona o input e o ícone do olho
const togglePassword = document.querySelector('.toggle-password');
const passwordInput = document.getElementById('senha');

togglePassword.addEventListener('click', () => {
  // Alterna o tipo do input
  const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);

  // Alterna o ícone
  if(type === 'text'){
    togglePassword.src = '/sistema_agendamento/icone_imagens/Login/Olho-aberto.svg';
  } else {
    togglePassword.src = '/sistema_agendamento/icone_imagens/Login//Olho-fechado.svg';
  }
});
