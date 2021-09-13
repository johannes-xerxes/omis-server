class Events {
    static listOfImageId = [];

    static UpdateFormAction(base, id) {
        if (!this.listOfImageId.includes(id)) {
            this.listOfImageId.push(id);
        }
        const idUrl = this.listOfImageId.join('-');
        document.getElementById('edit_event_form').action = base + idUrl;
        console.log(document.getElementById('edit_event_form').action)
    }
}
