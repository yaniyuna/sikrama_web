export default function Checkbox({ className = '', ...props }) {
    return (
        <input
            {...props}
            type="checkbox"
            className={
                'rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-200 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800 ' +
                className
            }
        />
    );
}
