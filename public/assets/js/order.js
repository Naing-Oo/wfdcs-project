$(document).on('click', '.btn-show', function (e) {

    e.preventDefault();

    const url = $(this).attr('href');

    $.get(url, function (res) {
        // console.log(res);

        for (const key in res) {
            // console.log(`key${key} - value${res[key]}`);

            if (key !== 'items') {

                if (key === 'address') {
                    $(`#${key}`).html(res[key]);
                } else {
                    $(`#${key}`).text(res[key]);
                }
            }
        }

        // console.log(res.items);
        const tbody = $('table#items tbody');

        tbody.children().remove();

        let rows = res.items.map(item => `
                    <tr>
                        <td>${item.number}</td>
                        <td>${item.product}</td>
                        <td class="text-right">${item.price}</td>
                        <td class="text-right">${item.qty}</td>
                        <td class="text-right">${item.total}</td>
                    </tr>
                `).join('');

        // console.log(rows);

        tbody.append(rows);

        $('#orderDetails').modal('show');
    });

});