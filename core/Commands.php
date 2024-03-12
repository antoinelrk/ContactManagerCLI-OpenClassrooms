<?php

readonly class Commands
{
    protected Contact $contact;

    public function __construct(
        protected \PDO $connection
    ){
        $this->contact = new Contact($this->connection);
    }

    public function list(string $command, array $params): void
    {
        $this->contact->all();
    }

    public function detail(string $command, array $params): void
    {
        $this->contact->find(intval($params[0]));
    }

    public function create(string $command, string $params): void
    {
        $this->contact->create($params);
    }

    public function delete(string $command, array $params): void
    {
        $this->contact->delete($params);
    }

    public function help(): void
    {
        /**
         * TODO: Remplacer le print par un printf avec un pattern.
         */
        foreach ($this->registeredCommands() as $key => $command)
        {
            Helper::print(
                Helper::foreground('cyan') .
                Helper::background('gray') .
                $key .
                Helper::reset() .
                ' - ' .
                $command
            );
        }
    }

    public function registeredCommands(): array
    {
        return [
            'list' => 'Usage: list',
            'detail' => 'Usage: detail [param INT]',
            'create' => 'Usage: create [name STR] [email STR] [phone_number STR]',
            'update' => 'Usage: update [id INT] [key:value] {email:contact@example.test} ...',
            'delete' => 'Usage: delete [id INT]',
            'help' => 'Usage: Show this help! :)'
        ];
    }

    /**
     * Initialize command and return relevant attributes.
     *
     * @param string $value
     * @return mixed
     */
    public function initCommand(string $value): mixed
    {
        $raws = explode(' ', $value, 2);
        $commandName = array_shift($raws);
        $line = $raws[0] ?? null;
        $params = explode(' ', $line);

        $commandsList = compact(['raws', 'commandName', 'line', 'params']);

        return json_decode(json_encode($commandsList));
    }
}
