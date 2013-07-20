<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SkeletonCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'skeleton:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Holds the user information.
     *
     * @var array
     */
    protected $userData = array(
        'first_name' => null,
        'last_name'  => null,
        'email'      => null,
        'password'   => null
    );

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->comment('=====================================');
        $this->comment('');
        $this->info('  Step: 1');
        $this->comment('');
        $this->info('    Por favor siga as seguintes');
        $this->info('    instruções para criar o seu');
        $this->info('    usuário padrão da aplicação.');
        $this->comment('');
        $this->comment('-------------------------------------');
        $this->comment('');

        $this->askUserFirstName();
        $this->askUserLastName();
        $this->askUserEmail();
        $this->askUserPassword();

        $this->comment('');
        $this->comment('');
        $this->comment('=====================================');
        $this->comment('');
        $this->info('  Step: 2');
        $this->comment('');
        $this->info('    Preparando sua aplicação');
        $this->comment('');
        $this->comment('-------------------------------------');
        $this->comment('');

        // Generate the Application Encryption key
        $this->call('key:generate');

        // Create the migrations table
        $this->call('migrate:install');

        // Run the Sentry Migrations
        $this->call('migrate', array('--package' => 'cartalyst/sentry'));

        // Run the Migrations
        $this->call('migrate');

        // Create the default user and default groups.
        $this->sentryRunner();

        // Seed the tables with dummy data
        $this->call('db:seed');
    }

    /**
     * Asks the user for the first name.
     *
     * @return void
     * @todo   Use the Laravel Validator
     */
    protected function askUserFirstName()
    {
        do
        {
            $first_name = $this->ask('Informe seu primeiro nome: ');

            if ($first_name == '')
            {
                $this->error('Não deixe em branco, digite novamente.');
            }

            $this->userData['first_name'] = $first_name;
        }
        while( ! $first_name);
    }

    /**
     * Asks the user for the last name.
     *
     * @return void
     * @todo   Use the Laravel Validator
     */
    protected function askUserLastName()
    {
        do
        {
            $last_name = $this->ask('Informe seu sobrenome: ');

            if ($last_name == '')
            {
                $this->error('Não deixe em branco, digite novamente.');
            }

            $this->userData['last_name'] = $last_name;
        }
        while( ! $last_name);
    }

    /**
     * Asks the user for the user email address.
     *
     * @return void
     * @todo   Use the Laravel Validator
     */
    protected function askUserEmail()
    {
        do
        {
            $email = $this->ask('Informe seu e-mail: ');

            if ($email == '')
            {
                $this->error('Não deixe em branco, digite novamente.');
            }
            $this->userData['email'] = $email;
        }
        while ( ! $email);
    }

    /**
     * Asks the user for the user password.
     *
     * @return void
     * @todo   Use the Laravel Validator
     */
    protected function askUserPassword()
    {
        do
        {
            $password = $this->ask('Informe sua senha: ');

            if ($password == '')
            {
                $this->error('A senha não pode ser deixada em branco, digite novamente.');
            }

            $this->userData['password'] = $password;
        }
        while( ! $password);
    }

    /**
     * Runs all the necessary Sentry commands.
     *
     * @return void
     */
    protected function sentryRunner()
    {
        $this->sentryCreateDefaultGroups();
        $this->sentryCreateUser();
    }

    /**
     * Creates the default groups.
     *
     * @return void
     */
    protected function sentryCreateDefaultGroups()
    {
        try
        {
            $group = Sentry::getGroupProvider()->create(array(
                'name'        => 'Administrador',
                'permissions' => array(
                    'admin' => 1,
                    'users' => 1
                )
            ));

            // Show the success message.
            $this->comment('');
            $this->info('Grupo Administrador criado com sucesso.');
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
        {
            $this->error('Grupo já existe.');
        }
    }

    /**
     * Create the user and associates the admin group to that user.
     *
     * @return void
     */
    protected function sentryCreateUser()
    {
        $data = array_merge($this->userData, array(
            'activated'   => 1,
            'permissions' => array(
                'admin' => 1,
                'user'  => 1,
            ),
        ));

        $user = Sentry::getUserProvider()->create($data);

        $group = Sentry::getGroupProvider()->findById(1);
        $user->addGroup($group);

        $this->comment('');
        $this->info('Usuário criado com sucesso.');
        $this->comment('');
    }

}