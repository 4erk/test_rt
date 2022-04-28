$('#queue-add-form').on('beforeSubmit', (e) => {
    e.preventDefault();
    let form = $(e.currentTarget);
    let data = form.serialize();
    $.post('/queue-status/add', data, (result) => alert(result ? 'Data added' : 'Data not added'));
    return false;
});