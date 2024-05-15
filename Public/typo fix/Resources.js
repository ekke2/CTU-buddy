

document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category-select');
    const resourceList = document.querySelector('.resource-list');
    const resourceSearch = document.getElementById('resource-search');

    function filterResourcesByCategory(category) {
        Array.from(resourceList.children).forEach(function(item) {
            const itemCategory = item.querySelector('a').textContent.toLowerCase();

            if (category === 'all' || itemCategory.includes(category)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    categorySelect.addEventListener('change', function() {
        const selectedCategory = this.value.toLowerCase();
        filterResourcesByCategory(selectedCategory);
    });

    resourceSearch.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        Array.from(resourceList.children).forEach(function(item) {
            const itemText = item.querySelector('a').textContent.toLowerCase();

            if (itemText.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
