
// Banner Script Start 

// view modal of category 
$('.viewbanner').click(function (e) {
    e.preventDefault();
    var viewId = $(this).attr('data-id');
    $.ajax({
        type: "POST",
        url: "{{ url('/admin/banner/view-banner') }}",
        data: {
            viewId: viewId,
            "_token": "{{ csrf_token() }}",
        },
        success: function (response) {
            $('#view_banner_title').html(response[0]['banner_title'])
            $('#view_banner_description').html(response[0]['banner_description'])
            $('#view_banner_image').attr('src', 'http://127.0.0.1:8000/uploads/banner/' +
                response[0]['banner_image'])
        }
    });
});

// product status change    
$('.bannerToggle-class').change(function () {
    var status = $(this).prop('checked') == true ? 1 : 0;
    var user_id = $(this).data('id');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: '/admin/banner/change-status',
        data: {
            'status': status,
            'user_id': user_id,
            "_token": "{{ csrf_token() }}",
        },
        success: function (data) {
            Swal.fire(
                'Success',
                data.success,
                'success'
            ).then((result) => {
                location.reload();
            });
        }
    });
})

$('.bannerdeletedata').click(function (e) {
    e.preventDefault();
    
    var deleteId = $(this).attr('data-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "/admin/banner/banner-data-delete",
                data: {
                    deleteId: deleteId,
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        Swal.fire(
                            'Deleted!',
                            response.success,
                            'success'
                        ).then((result) => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.fail,
                        })
                    }
                    // document.location.reload();
                }
            });

        }
    })

});

// Banner Script Ends




