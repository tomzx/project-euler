require "jcode"

def a_to_b(a, b)
  result = a ** b
  total = 0
  result.to_s.each_char do |x|
    total += x.to_i
  end
  total
end

biggest = 0
(0..99).each do |a|
  (0..99).each do |b|
    atob = a_to_b(a, b);
    if (atob > biggest)
      biggest = atob
    end
  end
end

puts biggest