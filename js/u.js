$('#choose-password').change(function()
{
    if ($(this).is(':checked'))
    {
        $('#file-password').css('display', 'block');
    }
    else
    {
        $('#file-password').css('display', 'none');
    }
});

$('#selected-file').on('click', function () {
    $('#file-input').click();
});
$('#file-input').on('change', function () {
    $('#select-file').val('Click here to select a different file');
    $('#submit-file').val('Click here to upload' + $(this).val().replace('C:\\fakepath\\', ''));
    $('#submit-file').css('display', 'block');
});
