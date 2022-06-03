const modalDeleteAllCats = document.querySelector('.form-delete-all-cats');
const deleteAllCatsBtn = document.querySelector('.form-submit-delete-all-cats');
const cancelAllCatsBtn = document.querySelector('.form-cancel-all-cat');

deleteAllCatsBtn.addEventListener('click', () => {
  modalDeleteAllCats.classList.add('modalDeleteAllCats_active');
})

cancelAllCatsBtn.addEventListener('click', (e) => {
  e.preventDefault();
  modalDeleteAllCats.classList.remove('modalDeleteAllCats_active');
});
