const deleteCheckboxBtn = document.querySelector('.delete-checkbox-cats');
const modalDeleteCheckbox = document.querySelector('.form-delete-checkbox-cats');
const cancelCheckboxBtn = document.querySelector('.form-cancel-checkbox');
const Checkboxes = document.querySelectorAll('.check-item');
const checkboxIds = document.querySelector('.form-id-item-checkbox');
let checks = [];

deleteCheckboxBtn.addEventListener('click', () => {
  modalDeleteCheckbox.classList.add('modalCheckbox_active');
});

cancelCheckboxBtn.addEventListener('click', (e) => {
  e.preventDefault();
  modalDeleteCheckbox.classList.remove('modalCheckbox_active');
});

Checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', () => {
    if(checks.includes(checkbox.dataset.itemid)){
      checks.splice(checks.indexOf(checkbox.dataset.itemid, 0), 1);
      checkboxIds.value = checks.join(' ');
    }
    else{
      checks.push(checkbox.dataset.itemid);
      checkboxIds.value = checks.join(' ');
    }
  })
})
