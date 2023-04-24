new Vue({
    el: '#app',
    data: {
        books: [],
        selectedRating: 'all',
    },
    created: function() {
        this.books = window.__INITIAL_STATE__
    },
    methods: {

    },
    computed: {
        filteredBooks: function() {
            if (this.selectedRating === 'all') {
                return this.books;
            } else {
                return this.books.filter(function(book) {
                    return book.rating == this.selectedRating;
                }.bind(this));
            }
        }
    }
});