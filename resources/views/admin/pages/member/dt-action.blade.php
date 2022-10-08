<button class="btn btn-sm btn-secondary mb-2"
data-url="{{ url('admin/members/'. $model->id_peserta) }}"
data-id="{{ $model->id_peserta }}"
id="btn-show"
data-toggle="tooltip"
data-placement="top"
title="Lihat Detail">
    <i class="fa fa-eye"></i>
</button>

<button class="btn btn-sm btn-warning mb-2"
data-url="{{ url('admin/members/'. $model->id_peserta) }}"
data-id="{{ $model->id_peserta }}"
id="btn-edit"
data-toggle="tooltip"
data-placement="top"
title="Edit">
    <i class="fa fa-pencil"></i>
</button>


<button class="btn btn-sm btn-danger mb-2"
    id="btn-delete"
    data-url="{{ url('admin/members/'. $model->id_peserta) }}"
    data-id="{{ $model->id_peserta }}"
    data-toggle="tooltip"
    data-placement="top"
    title="Hapus Peserta">

    <i class="fa fa-trash"></i>
</button>

<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
