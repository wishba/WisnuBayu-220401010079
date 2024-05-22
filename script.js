function showUpdate(updateId) {
  document.getElementById(`update-${updateId}`).classList.remove('hide')
  document.getElementById(`read-${updateId}`).classList.add('hide')
}

function hideUpdate(updateId) {
  document.getElementById(`update-${updateId}`).classList.add('hide')
  document.getElementById(`read-${updateId}`).classList.remove('hide')
}