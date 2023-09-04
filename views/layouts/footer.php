</div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $('body').on('click', 'a', function (e){
        e.preventDefault();
        $href = $(this).attr('href');
        $.ajax({
            url: $href,
            type: 'GET',
            success: function (data) {
                let pattern = /<body[^>]*>((.|[\n\r])*)<\/body>/im;
                data = data.match(pattern)[1];
                $('body').html(data);
                window.scrollTo(0, 0);
            }
        });
    });

</script>
</html>
