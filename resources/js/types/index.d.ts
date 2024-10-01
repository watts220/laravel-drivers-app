export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}
export interface Driver {
    id: number;
    first_name: string;
    last_name: string;
    email: string;
    email_verified_at?: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        driver: Driver;
        user: User;
    };
};
