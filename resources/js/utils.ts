function idGenerator(): () => number {
    let id: number = 0;

    return function (): number {
        return ++id;
    };
}

export { idGenerator };
