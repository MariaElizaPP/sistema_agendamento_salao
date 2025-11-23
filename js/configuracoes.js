document.addEventListener('DOMContentLoaded', function(){
  const btnLogout = document.getElementById('btn-logout');
  const modal = document.getElementById('logout-modal');
  const cancelBtn = document.getElementById('cancel-btn');

  btnLogout.addEventListener('click', function(e){
    e.preventDefault();
    modal.style.display = 'flex';
  });

  cancelBtn.addEventListener('click', function(){
    modal.style.display = 'none';
  });

  // fecha se clicar fora do modal
  window.addEventListener('click', function(e){
    if(e.target === modal){
      modal.style.display = 'none';
    }
  });
});

