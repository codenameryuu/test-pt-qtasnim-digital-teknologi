const form = document.getElementById("formSubmit");

const checkStock = function () {
  return {
    validate: async function (input) {
      const productId = $("#productId");

      if (productId.val() == "" || productId.val() == null) {
        return {
          valid: true,
        };
      }

      if (input.value == "" || input.value == null) {
        return {
          valid: true,
        };
      }

      const value = input.value == "" ? 0 : input.value;
      let valid = true;

      await axios({
        method: "GET",
        url: "/transaksi/cek-stok",
        params: {
          productId: productId.val(),
          quantity: value,
        },
      }).then(function (res) {
        const response = res.data;
        const status = response.status;

        if (!status) {
          valid = false;
        }
      });

      return {
        valid: valid,
      };
    },
  };
};

FormValidation.validators.checkStock = checkStock;

const fv = FormValidation.formValidation(form, {
  fields: {
    productId: {
      validators: {
        notEmpty: {
          message: "Produk tidak boleh kosong !",
        },
      },
    },

    quantity: {
      validators: {
        notEmpty: {
          message: "Jumlah tidak boleh kosong !",
        },

        checkStock: {
          message: "Jumlah tidak boleh melebihi stok produk !",
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
      formSubmit.attr("action", "/transaksi/ubah-data/" + id.val()).submit();
    }
  });
});

const productId = $("#productId");
productId.on("change.select2", function () {
  fv.revalidateField("productId");
});

function onChangeProductId() {
  const productId = $("#productId");
  const quantity = $("#quantity");

  if (productId.val() == "") {
    quantity.attr("readonly", true);
  } else {
    quantity.attr("readonly", false);
  }
}
