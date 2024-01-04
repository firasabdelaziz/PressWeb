# Laravel Blog

A Press application built with Laravel, featuring post creation, comments, user profiles, post categorization, and photo polymorphism.

## Features

- Post creation and commenting
- User profiles with bio information
- Categorization of posts with many-to-many relationships
- Polymorphic photo attachments

## Getting Started

1. Clone the repository:

   ```bash
   git clone https://github.com:firasabdelaziz/PressWeb.git
   ```

2. Install Laravel Sail:

   ```bash
   composer require laravel/sail --dev
   php artisan sail:install
   ```

3. Start Laravel Sail:

   ```bash
   ./vendor/bin/sail up
   ```


4. Run migrations:

   ```bash
   ./vendor/bin/sail artisan migrate
   ```

## Documentation

- See commit history for step-by-step implementation details
- Documentation comments in code provide additional insights

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your improvements.

## License

This project is open-source and available under the [MIT License](LICENSE).

