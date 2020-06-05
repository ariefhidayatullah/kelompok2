<script>
    $.ajax({
        url: 'http://localhost/bcit-ci-CodeIgniter-b73eb19/Mitra/mitra?RepairMe-API-KEY=repairme',
        type: 'get',
        dataType: 'json',
        success: function(data) {
            console.log(data);
        }
    });
</script>