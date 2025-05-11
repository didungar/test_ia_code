import React from 'react';
import { render, fireEvent } from '@testing-library/react';

// Composant à tester
const MyComponent = () => {
  const [count, setCount] = React.useState(0);

  return (
    <div>
      <p>Count: {count}</p>
      <button onClick={() => setCount(count + 1)}>Increment</button>
    </div>
  );
};

// Tests pour les cas généraux
describe('MyComponent', () => {
  it('should render the component', () => {
    const { container } = render(<MyComponent />);
    expect(container).toMatchSnapshot();
  });

  it('should display the count value', () => {
    const { getByText } = render(<MyComponent />);
    expect(getByText('Count: 0')).toBeInTheDocument();
  });

  it('should increment the count when clicking the button', () => {
    const { container, getByText } = render(<MyComponent />);
    fireEvent.click(container.querySelector('button'));
    expect(getByText('Count: 1')).toBeInTheDocument();
  });
});