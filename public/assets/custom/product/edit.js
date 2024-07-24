const form = document.getElementById("formSubmit");

const fv = FormValidation.formValidation(form, {
  fields: {
    productCategoryId: {
      validators: {
        notEmpty: {
          message: "Kategori produk tidak boleh kosong !",
        },
      },
    },

    name: {
      validators: {
        notEmpty: {
          message: "Nama tidak boleh kosong !",
        },
      },
    },

    stock: {
      validators: {
        notEmpty: {
          message: "Stok tidak boleh kosong !",
        },
      },
    },
  },
  plugins: {
    trigger: new FormValidation.plugins.Trigger(),
    bootstrap5: new FormValidation.plugins.Bootstrap5({
      eleValidClass: "",
      rowSelector: ".mb-3",
    }),

    submitButton: new FormValidation.plugins.SubmitButton(),
    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
    autoFocus: new FormValidation.plugins.AutoFocus(),
  },
  init: (instance) => {
    instance.on("plugins.message.placed", function (e) {
      if (e.element.parentElement.classList.contains("input-group")) {
        e.element.parentElement.insertAdjacentElement("afterend", e.messageElement);
      } else if (e.element.classList.contains("select2-hidden-accessible")) {
        e.element.nextElementSibling.insertAdjacentElement("afterend", e.messageElement);
      }
    });
  },
}).on("core.form.valid", function () {
  Swal.fire({
    icon: "question",
    text: "Apakah anda yakin ingin menyimpan data ini ?",
    showCancelButton: true,
    buttonsStyling: false,
    customClass: {
      confirmButton: "btn btn-primary",
      cancelButton: "btn btn-secondary",
    },
    confirmButtonText: "Simpan",
    cancelButtonText: "Batal",
  }).then(async (result) => {
    if (result.isConfirmed) {
      const formSubmit = $("#formSubmit");
      const id = $("#id");

      blockCard();
      formSubmit.attr("action", "/produk/ubah-data/" + id.val()).submit();
    }
  });
});

const productCategoryId = $("#productCategoryId");
productCategoryId.on("change.select2", function () {
  fv.revalidateField("productCategoryId");
});
