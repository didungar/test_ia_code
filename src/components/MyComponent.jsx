import React from 'react';
import { render, fireEvent } from '@testing-library/react';

// Import du composant à tester
import MyComponent from './MyComponent';

describe('MyComponent', () => {
  it('should display "Hello World" on mount', () => {
    const { getByText } = render(<MyComponent />);
    expect(getByText('Hello World')).toBeInTheDocument();
  });

  it('should update the state when the button is clicked', () => {
    const { getByRole, getByText } = render(<MyComponent />);
    const button = getByRole('button');
    fireEvent.click(button);
    expect(getByText('Updated')).toBeInTheDocument();
  });
});