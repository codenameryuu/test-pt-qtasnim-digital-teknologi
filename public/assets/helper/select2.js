const select2 = $(".select2");

if (select2.length) {
  select2.each(function () {
    const element = $(this);

    element.wrap('<div class="position-relative"></div>').select2({
      placeholder: "Pilih Salah Satu",
      allowClear: true,
      dropdownParent: element.parent(),
      theme: "bootstrap-5",
    });
  });
}
