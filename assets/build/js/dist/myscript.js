const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: flashData + '!',
        text: 'Data has been ' + flashData,
        icon: 'success',
        confirmButtonText: 'OK'
    });
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();   //mematikan fungsi default
    const hapus = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = hapus;
            // console.log(hapus);
        }
    })
});

// tombol-checkout
$('#checkout').on('click', function (e) {

    e.preventDefault();   //mematikan fungsi default
    const checkout = $('form').attr('action');

    Swal.fire({
        title: 'Are you sure?',
        text: "Is the menu you want to order correct?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {
            document.location.href = checkout;
            // console.log(hapus);
        }
    })
});