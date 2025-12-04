document.addEventListener("DOMContentLoaded", function () {
    loadData(1);

    const search = document.getElementById("search");

    search.addEventListener("keyup", function () {
        loadData(1, search.value);
    });
});

function loadData(page = 1, keyword = "") {
    const xhr = new XMLHttpRequest();

    const url = "fetch.php?page=" + page + "&keyword=" + encodeURIComponent(keyword);
    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);

            document.getElementById("result").innerHTML = response.data;
            document.getElementById("pagination").innerHTML = response.pagination;
        }
    };

    xhr.send();
}

function goPage(page) {
    const keyword = document.getElementById("search").value;
    loadData(page, keyword);
}
