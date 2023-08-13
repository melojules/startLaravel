# Laravel 10 

### Project Idea

1. User can create a new help ticket
2. Admin can reply on help ticket
3. Admin can reject or resolve the ticket
4. when admin update on the ticket then user will get one notification via email that ticket status is updated
5. user can give ticket title and description
5. user can upload a document like pdf or image

### table structure

1. Tickets -title(string) {required}
            description(text) {required}
            status(open, {default}, resolve, rejected) 
            attachemnts(string), {nullable}
            user_id {required} filled by laravel
            status_changed_by_id {nullable}

2. Replies - body(text) {required}
           - use_id {required} filled by laravel
           - ticket_id {required} filled by laravel