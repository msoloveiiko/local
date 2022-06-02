const editBtns = document.querySelectorAll('.cat-edit');
const modalEdit = document.querySelector('.cat-form-edit');
const cancelEditBtn = document.querySelector('.form-cancel-edit');
const idItemEdit = document.querySelector('.form-id-item-edit');
const emailItems = document.querySelectorAll('.your-email-link');
const nameItems = document.querySelectorAll('.your-cat-name');
const nameEdit = document.querySelector('.name-form-edit');
const emailEdit = document.querySelector('.email-form-edit');

editBtns.forEach(editBtn => {
  editBtn.addEventListener('click', () => {
    modalEdit.classList.add('modalEdit_active');
    idItemEdit.value = editBtn.dataset.itemid;
    nameItems.forEach(name => {
      if(name.dataset.itemid === editBtn.dataset.itemid){
        nameEdit.value = name.textContent;
      }
    });
    emailItems.forEach(email => {
      if(email.dataset.itemid === editBtn.dataset.itemid){
        emailEdit.value = email.outerText;
      }
    });
  })
});

cancelEditBtn.addEventListener('click', (e) => {
  e.preventDefault();
  modalEdit.classList.remove('modalEdit_active');
});
