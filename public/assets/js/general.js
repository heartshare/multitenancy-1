
    $(document).ready(function(){
        /* this used add the modal to add data */
        $("#add_button").click(function(event){
            event.preventDefault();
            var url = $(this).attr('href'); // take the action of the url
            $.ajax({
                url: url,
                method:"GET",
                data:'x',
                beforeSend:function(){
                    //
                },
                success:function(data){
                    $('.add-modal').modal('show');
                    $('.add-content').html(data.modal);
                },
                error: function (data) {
                    alert('Ooops something went wrong!');
                },
                complete : function (data){

                }
            });
        });

        /* Submit add modal */
        $("#btn_submit").click(function(event){
            event.preventDefault();
            var form = $('#add_form'); // refer the form you want
            var url = form.attr('action'); // take the action of the url
            var data = form.serialize(); // serialize the data in  the form
            // alert(data);

            jQuery.support.cors = true;
            $.ajax({
                url: url,
                method:"POST",
                data:data,
                beforeSend:function(){
                    //
                },
                success:function(data){
                    if (data.status == "errors"){
                        $('#validation-errors').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors').append('<li class="alert alert-danger">'+value+'</li>');
                        });

                        toastr.error(data.errors,'Error');
                        return false;
                    }else if(data.status == "error") {
                        toastr.error(data.error,'Error');
                    }else if(data.status == "success") {
                        $('.add-modal').modal('hide');
                        form[0].reset();
                        toastr.success(data.success, 'Success');
                        window.setTimeout(function(){location.reload()},3000)
                    }
                },
                error: function (data) {
                    console.log(data.errors);
                    alert('Ooops something went wrong!');
                },
            });
        });

        /* Submit edit modal */
        $(".edit_button").click(function(event){

            event.preventDefault();
            //Save the link in a variable called element
            var element = $(this);
            //Find the id of the link that was clicked
            var url = element.attr('href'); // take the action of the url
            // alert(url);

            $('.add-modal').modal('show');

            $.ajax({
                url: url,
                method:"GET",
                data:{},
                beforeSend:function(){
                    //
                },
                success:function(data){
                    $('.add-content').html(data.modal);
                },
                error: function (data) {
                    alert('Ooops something went wrong!');
                },
                complete : function (data){
                    $('.modal-title').html('Edit Member');
                }
            });
        });

        /* Submit update modal */
        $("#btn_submit_update").click(function(event){
            event.preventDefault();
            var form = $('#update_form'); // refer the form you want
            var url = form.attr('action'); // take the action of the url
            var data = form.serialize(); // serialize the data in  the form
            // alert(data);

            jQuery.support.cors = true;
            $.ajax({
                url: url,
                method:"POST",
                data:data,
                beforeSend:function(){
                    //
                },
                success:function(data){
                    if (data.status == "errors"){
                        $('#validation-errors').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors').append('<li class="alert alert-danger">'+value+'</li>');
                        });

                        toastr.error(data.errors,'Error');
                        return false;
                    }else if(data.status == "error") {
                        toastr.error(data.error,'Error');
                    }else if(data.status == "success") {
                        $('.add-modal').modal('hide');
                        form[0].reset();
                        toastr.success(data.success, 'Success');
                        window.setTimeout(function(){location.reload()},3000)
                    }
                },
                error: function (data) {
                    console.log(data.errors);
                    alert('Ooops something went wrong!');
                },
            });
        });
        // next
    });
