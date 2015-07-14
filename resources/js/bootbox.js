/**
 * Bootbox implementation
 */
$(".bootbox-confirm").click(function(e) {
    e.preventDefault();

    var form = $( e.target).closest("form");
    var deleteObject = form.attr('data-delete-object') || '';
    var deleteObjectName = form.attr('data-delete-name') || '';

    var confirmMessage = function(){
        switch(deleteObject) {
            case 'user':
                return 'Are you sure you want to delete ' + deleteObjectName + '?'
                break;
            case 'post':
                return 'Are you sure you want to delete post ' + deleteObjectName + '?';
                break;
            default:
                return 'Are you sure?';
        }
    };

    bootbox.confirm(confirmMessage, function(confirmed) {
        if (confirmed) {
            form.submit();
        }
    });
});