$(document).ready(function () {
  loadDatatable();
});

function loadDatatable() {
  const datatable = $("#datatable");
  const filterStartDate = $("#filterStartDate");
  const filterEndDate = $("#filterEndDate");

  datatable.DataTable({
    processing: true,
    serverSide: true,
    order: [],
    ajax: {
      url: "/transaksi/datatable",
      data: {
        filterStartDate: filterStartDate.val(),
        filterEndDate: filterEndDate.val(),
      },
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
        data: "productNameCustom",
        name: "productNameCustom",
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
        data: "quantityCustom",
        name: "quantityCustom",
      },

      {
        data: "transactionDateCustom",
        name: "transactionDateCustom",
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

function submitFilter() {
  const formFilter = $("#formFilter");

  const startDate = $("#filterStartDate");
  const endDate = $("#filterEndDate");

  if (!startDate.val()) {
    startDate.attr("name", "");
  }

  if (!endDate.val()) {
    endDate.attr("name", "");
  }

  formFilter.attr("action", "/transaksi").submit();
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
      formSubmit.attr("action", "/transaksi/hapus-data/" + id).submit();
    }
  });
}
