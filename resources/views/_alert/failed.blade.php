<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 

    <strong>
        <span class="glyphicon glyphicon-alert"></span> Error!  
    </strong> 

    @if (strpos(session('pesan_gagal'), '1451') !== false)
        Data ini sudah dipakai dalam transaksi, sehingga tidak bisa dihapus.<hr>

        <p><em>{{ session('pesan_gagal') }}</em></p>
    @elseif (strpos(session('pesan_gagal'), 'No query results for model') !== false)
        Data yang dicari tidak ditemukan.<hr>

        <p><em>{{ session('pesan_gagal') }}</em></p>
    @else
        <p style="margin-top: 10px;">{{ session('pesan_gagal') }}</p>
    @endif
</div>