<h3>Newsletter</h3>
<p class="news-desc">Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et.</p>
<form action="{{ route('subscriber.new') }}" class="news-letter-form" method="POST">
    @csrf
    <input type="text" name="email" class="form-control" placeholder="Enter your e-mail" id="email">
    <button type="button" class="btnsub" id="subs">Subscribe</button>
</form>
<script>
    $('#subs').on('click', function(e){
        e.preventDefault();
        console.log(grecaptcha.getResponse());//eugenesm
        $.ajax({
            url: '{{ route('subscriber.new')  }}',
            data:{
                _token: $('[name="_token"]').eq(0).val(),
                email: $('#email').val()
            },
            type: 'POST',
            success: function(response){
                if(response.errors){
                    notify(response.errors[0], 'error');
                }
                if(response.success){
                    notify(response.success);
                    $('#email').val('');
                }
            }
        })
    });
</script>
