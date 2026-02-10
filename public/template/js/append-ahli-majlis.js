$(document).ready(function () {

    $('#pekerjaan').on('change', function () {

        const value = $(this).val();
        const container = $('#ahli-majlis-container');

        // Clear dulu (penting!)
        container.empty();

        if (value === 'ahli_majlis') {

            const html = `
                <div class="form-group">
                    <label>
                            Zon
                        <span class="text-danger">*</span>
                    </label>

                    <select class="custom-select form-control"
                            name="zon_ahli_majlis">
                        <option value="">Pilih Zon</option>
                        <option value="zon_1">Zon 1</option>
                        <option value="zon_2">Zon 2</option>
                        <option value="zon_3">Zon 3</option>
                        <option value="zon_4">Zon 4</option>
                        <option value="zon_5">Zon 5</option>
                        <option value="zon_6">Zon 6</option>
                        <option value="zon_7">Zon 7</option>
                        <option value="zon_8">Zon 8</option>
                        <option value="zon_9">Zon 9</option>
                        <option value="zon_10">Zon 10</option>
                        <option value="zon_11">Zon 11</option>
                        <option value="zon_12">Zon 12</option>
                        <option value="zon_13">Zon 13</option>
                        <option value="zon_14">Zon 14</option>
                        <option value="zon_15">Zon 15</option>
                        <option value="zon_16">Zon 16</option>
                        <option value="zon_17">Zon 17</option>
                        <option value="zon_18">Zon 18</option>
                        <option value="zon_19">Zon 19</option>
                        <option value="zon_20">Zon 20</option>
                        <option value="zon_21">Zon 21</option>
                        <option value="zon_22">Zon 22</option>
                        <option value="zon_23">Zon 23</option>
                        <option value="zon_24">Zon 24</option>
                    </select>
                </div>
            `;

            container.append(html);
        }
    });

});