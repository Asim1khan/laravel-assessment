$(function() {
    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Delte This Data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
});

//for conform order sweet alert

$(function() {
    $(document).on('click', '#confirm', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure To confirm?',
            text: "Once Confirm, You will not be able to pending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirmed it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Confirm!',
                    'Confirm Changes',
                    'success'
                )
            }
        })
    });
});
// end of confirm order sweet alert





//for Processing order sweet alert

$(function() {
    $(document).on('click', '#processing', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure To Processing?',
            text: "Once Processing, You will not be able to Confirm again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Processing!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Processing!',
                    'Processing Changes',
                    'success'
                )
            }
        })
    });
});
// end of confirm order sweet alert


//for Pickedorder sweet alert

$(function() {
    $(document).on('click', '#picked', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure To PickedOrder?',
            text: "Once PickedOrder, You will not be able to Pending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, PickedOrdre!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Picked!',
                    'Picked Changes',
                    'success'
                )
            }
        })
    });
});
// end of confirm order sweet alert



//for Shipped sweet alert

$(function() {
    $(document).on('click', '#shipped', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure To ShippedOrder?',
            text: "Once ShippedOrder, You will not be able to Pending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ShippedOrdre!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Shipped!',
                    'Shipped Changes',
                    'success'
                )
            }
        })
    });
});
// end of confirm order sweet alert



//for Deliver sweet alert

$(function() {
    $(document).on('click', '#delivered', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure To DeliverOrder?',
            text: "Once DeliverOrder, You will not be able to Pending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, DeliverOrdre!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deliver!',
                    'Deliver Changes',
                    'success'
                )
            }
        })
    });
});
// end of confirm order sweet alert


//for Cancell sweet alert

$(function() {
    $(document).on('click', '#cancel', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure To CancellOrder?',
            text: "Once CancellOrder, You will not be able to Pending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, CancellOrdre!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Cancell!',
                    'Cancell Changes',
                    'success'
                )
            }
        })
    });
});
// end of confirm order sweet alert