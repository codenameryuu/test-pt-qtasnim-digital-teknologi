$(document).ready(function () {
  loadDatatable();
});

function loadDatatable() {
  const datatable = $("#datatable");

  datatable.DataTable({
    processing: true,
    serverSide: true,
    order: [],
    ajax: {
      url: "/produk/datatable",
      data: {},
    },
    columnDefs: [
      {
        targets: "_all",
        className: "text-center",
      },
    ],
    columns: [
      {
        data: "id",
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        },
      },

      {
        data: "name",
        name: "name",
      },

      {
        data: "productCategoryNameCustom",
        name: "productCategoryNameCustom",
      },

      {
        data: "stockCustom",
        name: "stockCustom",
      },

      {
        data: "highestQuantityTransaction",
        name: "highestQuantityTransaction",
      },

      {
        data: "lowestQuantityTransaction",
        name: "lowestQuantityTransaction",
      },

      {
        data: "action",
        name: "action",
        orderable: false,
        searchable: false,
      },
    ],
  });
}

function confirmDelete(id) {
  Swal.fire({
    icon: "question",
    text: "Apakah anda yakin ingin menghapus data ini ?",
    showCancelButton: true,
    buttonsStyling: false,
    customClass: {
      confirmButton: "btn btn-danger",
      cancelButton: "btn btn-secondary",
    },
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal",
  }).then(async (result) => {
    if (result.isConfirmed) {
      const formSubmit = $("#formSubmit");

      blockCard();
      formSubmit.attr("action", "/produk/hapus-data/" + id).submit();
    }
  });
}
