import { render } from '@testing-library/react';
import { MyComponent } from './MyComponent';

describe('MyComponent', () => {
  it('should render the component', () => {
    const { getByText } = render(<MyComponent />);
    expect(getByText(/Hello, world!/i)).toBeInTheDocument();
  });

  it('should display a message when clicked', () => {
    const { container } = render(<MyComponent />);
    fireEvent.click(container.firstChild);
    expect(getByText(/Clicked!/)).toBeInTheDocument();
  });
});