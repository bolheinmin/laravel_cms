// Proceed with form submission
$("#confirm_delete").off("submit").submit();
}
// $("#confirm_delete").off("submit").submit();
}, function(dismiss) {
// dismiss can be 'cancel', 'overlay',
// 'close', and 'timer'
if (dismiss === 'cancel') {
swal('Cancelled', 'Delete Cancelled :)', 'error');
}
})
});
});