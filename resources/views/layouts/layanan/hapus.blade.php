@if ($hapus)
<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
style="padding-right: 12px; display: block;">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Layanan</h5>
            <button wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
         <p>Anda yakin ingin menghapus data <strong>{{$nama}}</strong> ?</p>
        </div>
        <div class="modal-footer">
            <button wire:click="format" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button wire:click="destroy" type="button" class="btn btn-danger">Hapus</button>
        </div>
    </div>
</div>
</div>
@endif