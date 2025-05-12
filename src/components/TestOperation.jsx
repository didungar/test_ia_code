javascript
import { render, fireEvent, waitFor } from '@testing-library/react';
import TestOperation from './TestOperation';

describe('TestOperation', () => {
  it('should validate the results correctly', async () => {
    const mockFunction = jest.fn();
    const { getByText } = render(<TestOperation onResultValidation={mockFunction} />);

    // Simulate user input
    fireEvent.change(getByText('Input'), { target: { value: '123' } });
    fireEvent.click(getByText('Validate'));

    await waitFor(() => expect(mockFunction).toHaveBeenCalled());
    expect(mockFunction).toHaveBeenCalledWith({ isValid: true, result: 456 });
  });
});